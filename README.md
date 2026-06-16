# BlogBlog 📝

BlogBlog เป็นเว็บแอปพลิเคชันสำหรับการเขียนและแบ่งปันบทความ (Blog) พัฒนาด้วยเฟรมเวิร์ก **Laravel** โดยมีระบบจัดการเนื้อหาที่ครบถ้วน ตั้งแต่การสมัครสมาชิก การสร้างบทความ การคอมเมนต์ ไปจนถึงการกดถูกใจบทความ พร้อมทั้งมีระบบแยกสิทธิ์ผู้ใช้งาน (Admin และ User ทั่วไป)

## 🚀 ฟีเจอร์หลัก (Key Features)

- **Authentication System:** ระบบสมัครสมาชิก, เข้าสู่ระบบ, และจัดการรหัสผ่าน
- **Role Management:** ระบบจัดการสิทธิ์ผู้ใช้งานผ่าน Middleware (แยก Admin และ User)
- **Blog Management (CRUD):** ผู้ใช้สามารถ สร้าง, อ่าน, แก้ไข, และลบบทความของตนเองได้
- **Interaction:** - ระบบแสดงความคิดเห็น (Comment) ในแต่ละบทความ
  - ระบบกดถูกใจ / เลิกถูกใจ (Like / Unlike) บทความ
- **Profile Management:** หน้าจัดการโปรไฟล์ผู้ใช้งาน
- **Responsive Design:** รองรับการแสดงผลทุกขนาดหน้าจอ (ใช้ Tailwind CSS / Vite)

## 🛠️ เทคโนโลยีที่ใช้ (Tech Stack)

- **Backend:** PHP, Laravel Framework
- **Frontend:** Blade Templating, Tailwind CSS, JavaScript, Vite
- **Database:** MySQL (หรือฐานข้อมูลอื่นๆ ที่รองรับผ่าน Eloquent ORM)

## ⚙️ ขั้นตอนการติดตั้งและรันโปรเจกต์ (Installation & Setup)

กรุณาตรวจสอบให้แน่ใจว่าในเครื่องของคุณมีการติดตั้ง **PHP**, **Composer**, **Node.js** และ **MySQL** เรียบร้อยแล้ว

**1. Clone โปรเจกต์ลงมาที่เครื่องของคุณ**
` ` `bash
git clone https://github.com/saknarin818/blogblog.git
cd blogblog
` ` `

**2. ติดตั้ง Dependencies ของ Backend (PHP)**
` ` `bash
composer install
` ` `

**3. ติดตั้ง Dependencies ของ Frontend (Node.js)**
` ` `bash
npm install
` ` `

**4. ตั้งค่า Environment Variables**
ทำการคัดลอกไฟล์ `.env.example` แล้วเปลี่ยนชื่อเป็น `.env`
` ` `bash
cp .env.example .env
` ` `
จากนั้นให้เปิดไฟล์ `.env` ขึ้นมา และแก้ไขค่าสำหรับการเชื่อมต่อฐานข้อมูลให้ตรงกับเครื่องของคุณ:
` ` `env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ชื่อฐานข้อมูลที่คุณสร้างไว้
DB_USERNAME=ชื่อผู้ใช้ฐานข้อมูล (เช่น root)
DB_PASSWORD=รหัสผ่านฐานข้อมูล
` ` `

**5. สร้าง Application Key**
` ` `bash
php artisan key:generate
` ` `

**6. สร้างตารางฐานข้อมูลและข้อมูลจำลอง (Migrate & Seed)**
` ` `bash
php artisan migrate --seed
` ` `

**7. คอมไพล์ไฟล์ Frontend (CSS/JS)**
` ` `bash
npm run build
# หรือใช้คำสั่ง npm run dev หากต้องการรันในโหมดการพัฒนา
` ` `

**8. เปิดใช้งานเซิร์ฟเวอร์**
` ` `bash
php artisan serve
` ` `
ระบบจะพร้อมใช้งาน โดยสามารถเข้าถึงได้ที่ URL: `http://localhost:8000`
