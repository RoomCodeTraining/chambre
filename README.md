<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Vehicle Management System API Documentation

## Authentication

All API routes are protected by Laravel Sanctum authentication. You must include a valid authentication token in the request header:

```
Authorization: Bearer <your-token>
```

## API Endpoints

### Entity Types

```http
GET /api/v1/entity-types
GET /api/v1/entity-types/{id}
POST /api/v1/entity-types
PUT /api/v1/entity-types/{id}
PUT /api/v1/entity-types/{id}/enable
PUT /api/v1/entity-types/{id}/disable
```

### Entities

```http
GET /api/v1/entities
GET /api/v1/entities/{id}
POST /api/v1/entities
PUT /api/v1/entities/{id}
PUT /api/v1/entities/{id}/enable
PUT /api/v1/entities/{id}/disable
```

### Vehicles

```http
GET /api/v1/vehicles
POST /api/v1/vehicles
GET /api/v1/vehicles/{vehicle}
PUT /api/v1/vehicles/{vehicle}
DELETE /api/v1/vehicles/{vehicle}
```

### Vehicle Models

```http
GET /api/v1/vehicle-models
POST /api/v1/vehicle-models
GET /api/v1/vehicle-models/{vehicle_model}
PUT /api/v1/vehicle-models/{vehicle_model}
DELETE /api/v1/vehicle-models/{vehicle_model}
```

### Vehicle States

```http
GET /api/v1/vehicle-states
POST /api/v1/vehicle-states
GET /api/v1/vehicle-states/{vehicle_state}
PUT /api/v1/vehicle-states/{vehicle_state}
DELETE /api/v1/vehicle-states/{vehicle_state}
```

### Brands

```http
GET /api/v1/brands
POST /api/v1/brands
GET /api/v1/brands/{brand}
PUT /api/v1/brands/{brand}
DELETE /api/v1/brands/{brand}
```

### Colors

```http
GET /api/v1/colors
POST /api/v1/colors
GET /api/v1/colors/{color}
PUT /api/v1/colors/{color}
DELETE /api/v1/colors/{color}
```

### Workforce Types

```http
GET /api/v1/workforce-types
POST /api/v1/workforce-types
GET /api/v1/workforce-types/{workforce_type}
PUT /api/v1/workforce-types/{workforce_type}
DELETE /api/v1/workforce-types/{workforce_type}
```

### Workforces

```http
GET /api/v1/workforces
POST /api/v1/workforces
GET /api/v1/workforces/{workforce}
PUT /api/v1/workforces/{workforce}
DELETE /api/v1/workforces/{workforce}
```

### Shock Points

```http
GET /api/v1/shock-points
POST /api/v1/shock-points
GET /api/v1/shock-points/{shock_point}
PUT /api/v1/shock-points/{shock_point}
DELETE /api/v1/shock-points/{shock_point}
```

### Shocks

```http
GET /api/v1/shocks
POST /api/v1/shocks
GET /api/v1/shocks/{shock}
PUT /api/v1/shocks/{shock}
DELETE /api/v1/shocks/{shock}
```

### Shock Works

```http
GET /api/v1/shock-works
POST /api/v1/shock-works
GET /api/v1/shock-works/{shock_work}
PUT /api/v1/shock-works/{shock_work}
DELETE /api/v1/shock-works/{shock_work}
```

### Supplies

```http
GET /api/v1/supplies
POST /api/v1/supplies
GET /api/v1/supplies/{supply}
PUT /api/v1/supplies/{supply}
DELETE /api/v1/supplies/{supply}
```

### Assignment Reports

```http
GET /api/v1/assignment-reports
POST /api/v1/assignment-reports
GET /api/v1/assignment-reports/{assignment_report}
PUT /api/v1/assignment-reports/{assignment_report}
DELETE /api/v1/assignment-reports/{assignment_report}
```

### Assignment Experts

```http
GET /api/v1/assignment-experts
POST /api/v1/assignment-experts
GET /api/v1/assignment-experts/{assignment_expert}
PUT /api/v1/assignment-experts/{assignment_expert}
DELETE /api/v1/assignment-experts/{assignment_expert}
```

### Technical Conclusions

```http
GET /api/v1/technical-conclusions
POST /api/v1/technical-conclusions
GET /api/v1/technical-conclusions/{technical_conclusion}
PUT /api/v1/technical-conclusions/{technical_conclusion}
DELETE /api/v1/technical-conclusions/{technical_conclusion}
```

### Insurers

```http
GET /api/v1/insurers
```

### Repairers

```http
GET /api/v1/repairers
```

### Clients

```http
GET /api/v1/clients
POST /api/v1/clients
GET /api/v1/clients/{client}
PUT /api/v1/clients/{client}
DELETE /api/v1/clients/{client}
```

### Photos

```http
GET /api/v1/photos
POST /api/v1/photos
GET /api/v1/photos/{photo}
PUT /api/v1/photos/{photo}
DELETE /api/v1/photos/{photo}
```

### QR Codes

```http
GET /api/v1/qr-codes
POST /api/v1/qr-codes
GET /api/v1/qr-codes/{qr_code}
PUT /api/v1/qr-codes/{qr_code}
DELETE /api/v1/qr-codes/{qr_code}
```

### Statuses

```http
GET /api/v1/statuses
POST /api/v1/statuses
GET /api/v1/statuses/{status}
PUT /api/v1/statuses/{status}
DELETE /api/v1/statuses/{status}
```

## Common Response Format

All API responses follow this standard format:

### Success Response

```json
{
    "data": {
        // Resource data
    },
    "message": "Operation successful"
}
```

### Paginated Response

```json
{
    "data": [
        // Array of resources
    ],
    "links": {
        "first": "http://api.example.com/items?page=1",
        "last": "http://api.example.com/items?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://api.example.com/items",
        "per_page": 15,
        "to": 10,
        "total": 10
    }
}
```

### Error Response

```json
{
    "message": "Error message",
    "errors": {
        // Validation errors if any
    }
}
```

## Common Query Parameters

All list endpoints (GET requests without ID) support these query parameters:

- `per_page`: Number of items per page (default: 15)
- `page`: Page number for pagination
- `sort`: Field to sort by
- `order`: Sort order (asc/desc)
- `filter`: Filter criteria

## Status Codes

- `200 OK`: Request successful
- `201 Created`: Resource created successfully
- `204 No Content`: Resource deleted successfully
- `400 Bad Request`: Invalid request parameters
- `401 Unauthorized`: Authentication required
- `403 Forbidden`: Permission denied
- `404 Not Found`: Resource not found
- `422 Unprocessable Entity`: Validation failed
- `500 Internal Server Error`: Server error
