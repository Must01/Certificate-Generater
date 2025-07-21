# 🎓 Certificate Generator Web App

A simple Laravel-based web application that allows users to generate professional-looking PDF certificates through a form interface.

🔗 **Live Demo:**  
[https://certificate-generater-main-jh2xbw.laravel.cloud/certificate](https://certificate-generater-main-jh2xbw.laravel.cloud/certificate)

---

## 📷 Demo

<img width="1908" height="956" alt="image" src="https://github.com/user-attachments/assets/dd57cfef-dc49-4443-a093-3d83641dff5c" />

---

## 🚀 Features

- Responsive form for entering certificate details.
- Real-time preview with blur hover effect.
- Generates downloadable PDF certificates.
- Custom certificate template.
- Clean and minimal UI.
- No database required (works with SQLite but not used).

---

## 🛠 Built With

- Laravel 12.x
- Laravel DomPDF package
- Blade templates
- Vanilla CSS
- PHP 8.2+
- tcpdf library

---

## 📂 Installation (Local Development)

1. **Clone the project:**

```bash
git clone https://github.com/yourusername/certificate-generator.git
cd certificate-generator
```

Install dependencies:

```
composer install
```

Set up environment variables:
```
cp .env.example .env
php artisan key:generate
```
Run the app:
```
php artisan serve
Visit http://localhost:8000/certificate in your browser.
```

📄 Usage

Fill the form fields.
Click Generate Certificate.
A PDF will be generated and downloaded automatically.

📌 TODO / Roadmap

Add multi-language support.
Allow uploading custom backgrounds.
Save certificates history (optional).
Add email certificate delivery (optional).

Improve design and animations.

📬 Contact
For questions or custom certificate generators:
Mustapha Bouddahr
[Your Fiverr Profile Link]
[Your LinkedIn Profile Link]


