# AlQutaibiBank Payment API (Laravel skeleton)

هذا مشروع هيكلي (skeleton) بسيط API جاهز للربط مع حزمة **AlQutaibiBank-payment**.
المشروع لا يتضمن تثبيت Laravel نفسه — يجب أن يكون داخل مشروع Laravel موجود أو
يمكنك إنشاء مشروع Laravel جديد ثم نسخ الملفات التالية إليه.

## المكونات المضمنة
- `routes/api.php` — تعريف المسارات (request-payment, confirm-payment)
- `app/Http/Controllers/PaymentController.php` — الكنترولر المنفّذ للـ API
- `.env.example` — مثال لمتغيرات البيئة المطلوبة
- `composer.json` — يضم الاعتماد على الحزمة (قم بتشغيل composer بعد إنشاء المشروع)
- `public/index.html` — صفحة بسيطة للواجهة

## تعليمات سريعة للتشغيل
1. أنشئ مشروع Laravel جديد أو استخدم مشروع موجود:
   ```bash
   composer create-project laravel/laravel myproject
   cd myproject
   ```
2. انسخ محتويات هذا المجلد (الملفات) إلى جذر مشروع Laravel.
3. ثبّت الحزمة الخاصة بالبوابة:
   ```bash
   composer require alsharie/alqutaibibank-payment
   ```
4. انشر إعدادات الحزمة:
   ```bash
   php artisan vendor:publish --provider="Alsharie\AlQutaibiBankPayment\AlQutaibiBankServiceProvider"
   ```
5. ضع مفاتيحك في `.env` (أو انسخ `.env.example` إلى `.env` وعدّل القيم):
   ```
   AlQutaibiBank_APP_KEY=YOUR_APP_KEY
   AlQutaibiBank_API_KEY=YOUR_API_KEY
   AlQutaibiBank_PAYMENT_DESTNATION=YOUR_MERCHANT_DEST
   AlQutaibiBank_BASE_URL=https://newdc.qtb-bank.com:5052/PayBills
   ```
6. شغّل الخادم محلياً:
   ```bash
   php artisan serve
   ```
7. استخدم Postman أو fetch لاستدعاء:
   - POST /api/request-payment
   - POST /api/confirm-payment

## ملاحظة أمان
لا تخزن مفاتيح API في مستودع عام. استخدم متغيرات البيئة وتهيئة سرية (env vault).
