# AI Coding Agent Instructions for Mandrain Laravel Project

## Project Overview
Mandrain is a Laravel 10 application for a vegetable/fruit marketplace with a separate admin panel. It features dual authentication: Sanctum-based API for users and session-based auth for admins using phone numbers.

## Architecture Patterns
- **Dual Auth System**: Use `Auth::guard('admin')` for admin operations, `Auth::guard('sanctum')` for API users
- **Admin Model**: Phone-based login, avatar storage in `storage/app/public/`, role-based access
- **RTL Arabic UI**: Bootstrap RTL with custom CSS variables in `resources/css/mandrain-colors.css`
- **Asset Building**: Vite compiles `resources/js/admin.js`, `resources/js/app.js`, and `resources/css/app.css`

## Key Conventions
- **Admin Routes**: Defined in `routes/admin.php` with `auth:admin` middleware
- **Validation Messages**: Always include Arabic error messages in validators
- **Avatar Handling**: Store in `storage/app/public/`, access via `asset('storage/' . $path)`, fallback to `admin/images/default-avatar.png`
- **Phone Uniqueness**: Admins use phone as unique identifier, not email
- **Seeder Pattern**: Use `Admin::updateOrCreate(['phone' => '...'], [...])` for admin seeding

## Development Workflows
- **Setup**: `composer install && npm install && php artisan migrate && php artisan db:seed`
- **Development**: `php artisan serve` (backend) + `npm run dev` (frontend assets)
- **Testing**: `php artisan test` (PHPUnit)
- **Cache Clearing**: `php artisan tools:clear-cache` or via admin panel
- **Build**: `npm run build` for production assets

## Code Examples
- **Admin Auth Check**: `if (Auth::guard('admin')->check()) { $admin = Auth::guard('admin')->user(); }`
- **Avatar URL**: `$admin->getAvatarUrlAttribute()` returns full URL with fallback
- **Admin Route**: `Route::middleware('auth:admin')->get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');`
- **Validation**: Include Arabic messages: `'name.required' => 'الاسم مطلوب.'`

## File Structure Highlights
- `app/Models/Admin.php`: Phone auth, avatar accessor
- `routes/admin.php`: All admin routes with auth middleware
- `resources/views/admin/`: Blade templates with Arabic content
- `resources/js/admin.js`: Bootstrap tooltips, theme toggle, cache clearing
- `database/seeders/AdminSeeder.php`: Seeds super admin with Arabic role

Focus on Arabic localization, admin-first features, and maintaining the green/orange color scheme.