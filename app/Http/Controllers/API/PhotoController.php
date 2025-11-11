<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Photo;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\PhotoType;
use App\Models\Assignment;
use App\Enums\PhotoTypeEnum;
use App\Models\AssignmentRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Support\Facades\File;
use App\Http\Resources\Photo\PhotoResource;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Http\Requests\Photo\CreatePhotoRequest;
use App\Http\Requests\Photo\UpdatePhotoRequest;
use App\Http\Requests\Photo\CreateMultiplePhotoRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des photos
 *
 * APIs pour la gestion des photos
 */
class PhotoController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les photos
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $photos = Photo::select('photos.*')
                        ->with('assignment:id,reference', 'assignmentRequest:id,reference', 'photoType:id,code,label', 'status:id,code,label')
                        ->join('assignments', 'photos.assignment_id', '=', 'assignments.id')
                        ->accessibleBy(auth()->user())
                        ->when(request()->has('assignment_id'), function($query){
                            $query->where('photos.assignment_id', Assignment::keyFromHashId(request()->assignment_id));
                        })
                        ->when(request()->has('assignment_request_id'), function($query){
                            $query->where('photos.assignment_request_id', AssignmentRequest::keyFromHashId(request()->assignment_request_id));
                        })
                        ->when(request()->has('photo_type_id'), function($query){
                            $query->where('photos.photo_type_id', PhotoType::keyFromHashId(request()->photo_type_id));
                        })
                        ->when(request()->has('status_id'), function($query){
                            $query->where('photos.status_id', Status::keyFromHashId(request()->status_id));
                        })
                        ->latest('photos.created_at')
                        ->useFilters()
                        ->dynamicPaginate();

        return PhotoResource::collection($photos);
    }

    /**
     * Ajouter une photo
     *
     * @authenticated
     */
    public function store(CreatePhotoRequest $request): JsonResponse
    {
        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;

        $assignment = Assignment::where('id', $request->assignment_id)->accessibleBy(auth()->user())->firstOrFail();

        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            // $name = 'IMG_BP'.$today.'_'.$count.'.'.$file->getClientOriginalExtension();
            $name = 'IMG_'.$today.'.png';
            $file->move(public_path('storage/photos/'.$assignment->reference), $name);

            $photo = Photo::create([
                'name' => $name,
                'is_cover' => false,
                'assignment_id' => $assignment->id,
                'photo_type_id' => $request->photo_type_id,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        if($assignment->status_id == Status::where('code', StatusEnum::IN_EDITING)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::EDITED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id){
            // dispatch(new GenerateExpertiseReportPdfJob($assignment));
        }

        return $this->responseCreated('Photo created successfully', new PhotoResource($photo));
    }

    /**
     * Ajouter plusieurs photos
     *
     * @authenticated
     */
    public function storeMultiple(CreateMultiplePhotoRequest $request): JsonResponse
    {
        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;

        $assignment = Assignment::where('id', $request->assignment_id)->accessibleBy(auth()->user())->firstOrFail();
        
        $files = [];
        if($request->hasfile('photos'))
        {
            $count = 0;
            if($request->file('photos') && $request->hasfile('photos')){
                foreach($request->file('photos') as $file)
                {
                    $count = $count + 1;
                    if($request->photo_type_id == PhotoType::where('code', PhotoTypeEnum::BEFORE)->first()->id){
                        $name = 'IMG_BP'.$today.'_'.$count.'.png';
                    } elseif($request->photo_type_id == PhotoType::where('code', PhotoTypeEnum::DURING)->first()->id){
                        $name = 'IMG_DP'.$today.'_'.$count.'.png';
                    } elseif($request->photo_type_id == PhotoType::where('code', PhotoTypeEnum::AFTER)->first()->id){
                        $name = 'IMG_AP'.$today.'_'.$count.'.png';
                    } else {
                        $name = 'IMG_'.$today.'_'.$count.'.png';
                    }
                    $file->move(public_path("storage/photos/report/{$assignment->reference}"), $name);

                    $photo = Photo::create([
                        'name' => $name,
                        'is_cover' => false,
                        'assignment_id' => $assignment->id,
                        'photo_type_id' => $request->photo_type_id,
                        'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                        'created_by' => auth()->user()->id,
                        'updated_by' => auth()->user()->id,
                    ]);
                }
            } 
            else{
                return $this->responseNotFound('Pas de photos trouvées');
            }
        }

        // foreach ($photos as $photo) {
        //     $photo = $request->file('photo')->store('photos', 'public');
        // }

        if($assignment->status_id == Status::where('code', StatusEnum::IN_EDITING)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::EDITED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id){
            // dispatch(new GenerateExpertiseReportPdfJob($assignment));
        }

        return $this->responseCreated('Photo created successfully', null);
    }

    /**
     * Afficher une photo
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $photo = Photo::select('photos.*')
            ->with('assignment:id,reference', 'assignmentRequest:id,reference', 'photoType:id,code,label', 'status:id,code,label')
            ->join('assignments', 'photos.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('photos.id', Photo::keyFromHashId($id))
            ->first();

        return $this->responseSuccess(null, new PhotoResource($photo));
    }

    /**
     * Mettre à jour une photo
     *
     * @authenticated
     */
    public function update(UpdatePhotoRequest $request, $id): JsonResponse
    {
        $photo = Photo::select('photos.*')
            ->with('assignment:id,reference,status_id')
            ->join('assignments', 'photos.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('photos.id', Photo::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::where('id', $photo->assignment_id)->accessibleBy(auth()->user())->firstOrFail();

        if($request->hasfile('photo'))
        {
            $annee = date("Y");
            $mois_jour_heure = date("mdH");
            $time = date("is");
            $today = $annee.'_'.$mois_jour_heure.'_'.$time;
            if($request->photo_type_id == PhotoType::where('code', PhotoTypeEnum::BEFORE)->first()->id){
                $name = 'IMG_BP'.$today.'.png';
            } elseif($request->photo_type_id == PhotoType::where('code', PhotoTypeEnum::DURING)->first()->id){
                $name = 'IMG_DP'.$today.'.png';
            } elseif($request->photo_type_id == PhotoType::where('code', PhotoTypeEnum::AFTER)->first()->id){
                $name = 'IMG_AP'.$today.'.png';
            } else {
                $name = 'IMG_'.$today.'.png';
            }
            $file = $request->file('photo');

            if(file_exists(public_path("storage/photos/work-sheet/{$assignment->reference}/{$photo->name}"))){
                $file->move(public_path("storage/photos/work-sheet/{$assignment->reference}"), $name);
            } else {
                $file->move(public_path("storage/photos/report/{$assignment->reference}"), $name);
            }
        }

        $photo->update([
            'name' => $name ?? $photo->name,
            'photo_type_id' => $request->photo_type_id,
            'updated_by' => auth()->user()->id,
        ]);

        if($assignment->status_id == Status::where('code', StatusEnum::IN_EDITING)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::EDITED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id){
            // dispatch(new GenerateExpertiseReportPdfJob($assignment));
        }

        return $this->responseSuccess('Photo updated Successfully', new PhotoResource($photo));
    }

    /**
     * Rendre une photo comme photo de couverture
     *
     * @authenticated
     */
    public function makeCover($id): JsonResponse
    {
        $photo = Photo::select('photos.*')
            ->with('assignment:id,reference,status_id')
            ->join('assignments', 'photos.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('photos.id', Photo::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::where('id', $photo->assignment_id)->accessibleBy(auth()->user())->firstOrFail();

        Photo::query()->where('id', '!=', $photo->id)->update([
            'is_cover' => 0,
        ]);

        $photo->update([
            'is_cover' => 1,
            'updated_by' => auth()->user()->id,
        ]);

        if($assignment->status_id != Status::where('code', StatusEnum::OPENED)->first()->id && $assignment->status_id != Status::where('code', StatusEnum::REALIZED)->first()->id){
            dispatch(new GenerateExpertiseReportPdfJob($assignment));
        }

        return $this->responseSuccess('Photo cover updated Successfully', new PhotoResource($photo));
    }

    /**
     * Supprimer une photo
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $photo = Photo::select('photos.*')
            ->with('assignment:id,reference,status_id')
            ->join('assignments', 'photos.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('photos.id', Photo::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::where('id', $photo->assignment_id)->accessibleBy(auth()->user())->firstOrFail();

        if(file_exists(public_path("storage/photos/report/{$assignment->reference}/{$photo->name}"))){
            File::delete(public_path("storage/photos/report/{$assignment->reference}/{$photo->name}"));
        }

        if(file_exists(public_path("storage/photos/work-sheet/{$assignment->reference}/{$photo->name}"))){
            File::delete(public_path("storage/photos/work-sheet/{$assignment->reference}/{$photo->name}"));
        }

        $photo->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'updated_by' => auth()->user()->id,
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
        ]);

        if($assignment->status_id == Status::where('code', StatusEnum::IN_EDITING)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::EDITED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id){
            // dispatch(new GenerateExpertiseReportPdfJob($assignment));
        }

        return $this->responseDeleted();
    }

   
}
