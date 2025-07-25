# 🎓 Certificate Generator Web App

A modern, bilingual (🇺🇸 English & 🇲🇦 Arabic) Laravel web app that allows users to generate professional-looking PDF certificates in seconds.

🔗 **Live Demo:**  
[https://certificate-generater.laravel.cloud](https://certificate-generator.laravel.cloud)

---

## 📷 Demo
<img width="1880" height="965" alt="preview" src="https://github.com/user-attachments/assets/cc1b3e6d-9ad0-4028-b5a6-9483f97913b3" />

---

## 🚀 Features

✅ Responsive form to input:
- Full Name  
- Course Name  
- Academy & Director  
- Date   
- **Custom Logo Upload**

✅ Live Preview (real-time)  
✅ Downloadable PDF generation (via Laravel DomPDF)  
✅ **RTL/LTR support** with separate layout styles for Arabic and English  
✅ Clean modern UI with Tailwind CSS  
✅ No database setup required  
✅ Simple and intuitive experience

---

## 🌍 Languages Supported

- English 🇺🇸
- Arabic 🇲🇦

All texts and UI adapt to the selected locale. Translations handled through `resources/lang/{locale}`.

---

## 🛠 Built With

- **Laravel 12.x**
- **Laravel TCPDF** (`tecnickcom/TCPDF`)
- **Alpine.js** for live reactivity
- **Blade Components**
- **Tailwind CSS**
- **PHP 8.2+**

---

## 📂 Installation (Local Development)

1. Clone the project
```
git clone https://github.com/yourusername/certificate-generator.git
cd certificate-generator
```

# 2. Install dependencies
```
composer install
```

# 3. Copy .env and generate key
```
cp .env.example .env
php artisan key:generate
```

# 4. Serve the app
```
php artisan serve
```

👉 Open your browser and visit:
http://localhost:8000/

📄 Usage

1. Fill out the form with all required details
2. Select a certificate type (e.g. Participation, Appreciation, etc.)
3. Upload your organization’s logo
4. Click “Generate Certificate”
5. The certificate is downloaded as a PDF file and matches the live preview!


📬 Contact
If you have suggestions or need a custom certificate generator:

Mustapha Bouddahr
📧 mustaphabouddahr.dev@gmail.com
💼 [Fiverr Profile](https://www.fiverr.com/s/P28jbeE)
🔗 [LinkedIn Profile](https://www.linkedin.com/in/mustapha-bouddahr-830787338/)

🧠 Made with Laravel + ❤️ in Morocco 🇲🇦 By [Mustapha Bouddahr](https://linktr.ee/mustaphabouddahr)
