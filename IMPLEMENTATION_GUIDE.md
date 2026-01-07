# Package Management System - Implementation Guide

## Overview

Sistem manajemen paket perjalanan dengan 2 kategori utama (Domestik & Internasional), support multilingual (ID/EN), dan background image yang berganti secara otomatis dengan efek fade.

## Database Structure

### Tables Created

1. **categories** - Kategori paket (Domestik/Internasional)
2. **category_translations** - Terjemahan nama kategori
3. **category_backgrounds** - Background images untuk setiap kategori (multiple, rotating)
4. **packages** - Data paket perjalanan
5. **package_translations** - Terjemahan konten paket
6. **package_images** - Gallery images untuk setiap paket
7. **services** - Master layanan (Hotel, Transport, dll)
8. **service_translations** - Terjemahan nama layanan
9. **package_service** - Pivot table paket & layanan

## Features Implemented

### 1. Filament Admin Panel (http://localhost/admin)

-   **CategoryResource**: Manage categories dengan translations & backgrounds
-   **PackageResource**: Manage packages dengan translations, images, services
-   **ServiceResource**: Manage services dengan translations

### 2. Dynamic Packages Page

-   2 kategori utama (Domestik & Internasional)
-   Background image berganti otomatis setiap 5 detik dengan fade effect
-   Package cards dynamis dari database
-   Multilingual support (session-based)

### 3. Seeders

-   **CategorySeeder**: 2 categories dengan 7 background images total
    -   Domestik: 3 backgrounds (semarang.jpg, borobudur.jpg, karimun.jpg)
    -   Internasional: 4 backgrounds (korea.jpg, jepang.jpg, china.jpg, vietnam2.jpg)
-   **ServiceSeeder**: 6 services (hotel, transport, tour-guide, meals, entrance-ticket, insurance)
-   **PackageSeeder**: 6 sample packages (3 domestic, 3 international)

## Installation Steps

### Step 1: Start MySQL Server

```bash
# Windows (XAMPP)
# Buka XAMPP Control Panel dan start MySQL

# Atau via services.msc
# Start service "MySQL80" atau sesuai versi Anda
```

### Step 2: Verify Database Connection

```bash
php artisan db:show
```

### Step 3: Run Migrations

```bash
# Fresh migration (WARNING: akan hapus semua data)
php artisan migrate:fresh

# Atau migration biasa (tambah table baru saja)
php artisan migrate
```

### Step 4: Prepare Images

Siapkan images berikut di folder `public/image/`:

**Category Backgrounds:**

-   semarang.jpg
-   borobudur.jpg (opsional, bisa ganti nama dari existing)
-   karimun.jpg (opsional)
-   korea.jpg
-   jepang.jpg (opsional)
-   china.jpg
-   vietnam2.jpg (opsional)

**Package Thumbnails:**

-   brosursemarang.jpeg
-   brosurdieng.jpeg
-   brosurkarimun.jpeg
-   brosurkorea.jpeg
-   brosurjepang.jpeg
-   brosurchina.jpeg

**Note:** Jika file tidak ada, seeder akan tetap jalan tapi image tidak akan tampil. Update path di seeder jika nama file berbeda.

### Step 5: Run Seeders

```bash
# Jalankan semua seeders
php artisan db:seed

# Atau jalankan individual seeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=ServiceSeeder
php artisan db:seed --class=PackageSeeder
```

### Step 6: Create Filament Admin User

```bash
php artisan make:filament-user
```

Input:

-   Name: Admin
-   Email: admin@thesun.com
-   Password: (pilih password Anda)

### Step 7: Create Storage Symbolic Link (if not exists)

```bash
php artisan storage:link
```

## Testing

### 1. Test Frontend

-   Homepage: http://localhost (hero sliders + gallery sudah dynamic)
-   Packages: http://localhost/packages (2 kategori dengan rotating backgrounds)

### 2. Test Admin Panel

-   Login: http://localhost/admin
-   Create/Edit Categories (dengan translations & backgrounds)
-   Create/Edit Services (dengan translations)
-   Create/Edit Packages (dengan translations, images, services)

## File Structure

### Controllers

-   `app/Http/Controllers/HomeController.php` - Home page handler
-   `app/Http/Controllers/PackagesController.php` - Packages page handler

### Models

-   `app/Models/Category.php`
-   `app/Models/CategoryTranslation.php`
-   `app/Models/CategoryBackground.php`
-   `app/Models/Package.php`
-   `app/Models/PackageTranslation.php`
-   `app/Models/PackageImage.php`
-   `app/Models/Service.php`
-   `app/Models/ServiceTranslation.php`

### Migrations

-   `database/migrations/2026_01_07_*_create_*_table.php` (9 files)

### Seeders

-   `database/seeders/CategorySeeder.php`
-   `database/seeders/ServiceSeeder.php`
-   `database/seeders/PackageSeeder.php`

### Views

-   `resources/views/packages.blade.php` (dynamic version)
-   `resources/views/packages_old.blade.php` (backup original)

### Filament Resources

-   `app/Filament/Resources/CategoryResource.php`
-   `app/Filament/Resources/ServiceResource.php`
-   `app/Filament/Resources/PackageResource.php`

## Usage Examples

### Add New Package via Filament

1. Login ke admin panel
2. Klik "Packages" di sidebar
3. Klik "New Package"
4. Isi form:
    - Select Category (Domestic/International)
    - Upload Thumbnail
    - Set Price & Duration
    - Tab "Translations": isi Title & Description untuk ID dan EN
    - Tab "Images": upload gallery images (optional)
    - Tab "Services": check services yang included
5. Save

### Add Background Image to Category

1. Login ke admin panel
2. Klik "Categories"
3. Edit category (Domestic atau International)
4. Scroll ke section "Background Images"
5. Click "Add Item"
6. Upload image
7. Set order (urutan rotasi)
8. Save

## Customization

### Change Background Rotation Speed

Edit `resources/views/packages.blade.php`, line ~245:

```javascript
data.interval = setInterval(() => rotateBackground(categorySlug), 5000); // 5000ms = 5 detik
```

### Change Locale

URL: http://localhost/set-locale/en atau http://localhost/set-locale/id

### Modify Seeder Data

Edit files:

-   `database/seeders/CategorySeeder.php` - ubah nama kategori, background paths
-   `database/seeders/ServiceSeeder.php` - tambah/ubah services
-   `database/seeders/PackageSeeder.php` - tambah/ubah sample packages

Lalu jalankan ulang:

```bash
php artisan db:seed --class=NamaSeeder
```

## Troubleshooting

### Issue: Images tidak muncul

**Solution:**

1. Pastikan `php artisan storage:link` sudah dijalankan
2. Check file images ada di `public/image/` atau `storage/app/public/`
3. Update path di seeder jika nama file berbeda

### Issue: Background tidak rotate

**Solution:**

1. Check console browser untuk JavaScript errors
2. Pastikan category memiliki minimal 2 background images
3. Check `category_backgrounds.is_active = 1`

### Issue: Translation tidak muncul

**Solution:**

1. Check session locale: `dd(session('locale'))`
2. Pastikan ada data di `category_translations` dan `package_translations`
3. Pastikan locale 'id' atau 'en' (lowercase)

### Issue: Migration error "table already exists"

**Solution:**

```bash
# Drop semua table dan buat ulang
php artisan migrate:fresh

# Lalu seed ulang
php artisan db:seed
```

## Next Steps

1. ✅ Migrations & Models
2. ✅ Seeders
3. ✅ Filament Resources
4. ✅ Frontend Dynamic Views
5. 🔄 Upload real images to `public/image/`
6. 🔄 Run migrations & seeders
7. 🔄 Create admin user
8. 🔄 Test full system
9. ⏳ Add more packages via Filament admin
10. ⏳ Customize translations
11. ⏳ Add package booking system (future)

## Contact

Jika ada error atau pertanyaan, silakan check:

-   Laravel logs: `storage/logs/laravel.log`
-   Browser console untuk JavaScript errors
-   Database table structure dengan `php artisan db:show`
