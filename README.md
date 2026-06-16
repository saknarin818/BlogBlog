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
```bash
git clone [https://github.com/your-username/blogblog.git](https://github.com/your-username/blogblog.git)
cd blogblog
