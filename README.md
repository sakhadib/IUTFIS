# IUT Al-Fazari Interstellar Society 🚀

**The Official Astronomy, Astrophysics, and Natural Sciences Club of Islamic University of Technology**

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat&logo=php)](https://www.php.net)
[![Vite](https://img.shields.io/badge/Vite-5.0-646CFF?style=flat&logo=vite)](https://vitejs.dev)

## 🌌 About

The **IUT Al-Fazari Interstellar Society** is a vibrant student organization at Islamic University of Technology, Gazipur, Bangladesh. Founded in 2019, our mission is to inspire and educate students about the wonders of the cosmos through events, workshops, seminars, and competitions. We foster curiosity and knowledge about the universe in a collaborative and inclusive environment.

**"The society that connects the stars."**

## ✨ Features

### 🎯 Core Functionality
- **Member Management**: Comprehensive member profiles with social media integration
- **Executive Panel System**: Hierarchical management with admin and reporter roles
- **Event Management**: Organize and track astronomy and science events
- **Workshop System**: Manage educational workshops and seminars
- **Achievement Tracking**: Record and showcase member accomplishments
- **Content Management**: Blog-style posts with categorization and approval system
- **Speaker Profiles**: Manage guest speakers and their information

### 🎨 User Experience
- **Responsive Design**: Modern, mobile-friendly interface
- **Admin Dashboard**: Comprehensive administrative controls
- **Member Profiles**: Individual member showcase pages
- **Event Details**: Rich event information pages
- **Social Integration**: LinkedIn, Facebook, Instagram, and portfolio links

## 🏗️ System Architecture

### Database Schema

#### 👥 User Management
- **`members`**: Core member information with social media profiles
- **`executives`**: Executive positions and admin privileges
- **`panels`**: Organizational panels and committees

#### 📅 Content & Events
- **`events`**: Event scheduling and management
- **`workshops`**: Workshop organization and tracking
- **`posts`**: Blog posts and announcements with approval workflow
- **`categories`**: Content categorization system
- **`speakers`**: Guest speaker management

#### 🏆 Recognition
- **`achievements`**: Member and society achievements
- **`winners`**: Competition and award winners

#### 📝 Audit & Logging
- **`editlogs`**: Track content modifications
- **`deletelogs`**: Maintain deletion records

### Key Models & Relationships

```php
Member (1:N) -> Executive -> Panel
Member (1:N) -> Event
Executive (1:N) -> Post -> Category
Achievement (1:N) -> Winner
Workshop (1:N) -> Speaker
```

## 🚀 Getting Started

### Prerequisites
- **PHP 8.1+**
- **Composer**
- **Node.js & npm**
- **MySQL/PostgreSQL**

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-repo/IUTFIS.git
   cd IUTFIS
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   - Update `.env` with your database credentials
   - Create database: `CREATE DATABASE iutfis;`

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database (optional)**
   ```bash
   php artisan db:seed
   ```

8. **Build assets**
   ```bash
   npm run dev
   # or for production
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to access the application.

## 📁 Project Structure

```
IUTFIS/
├── app/
│   ├── Http/Controllers/          # Application controllers
│   │   ├── member_controller.php  # Member management
│   │   ├── event_controller.php   # Event management
│   │   ├── post_controller.php    # Content management
│   │   └── ...
│   └── Models/                    # Eloquent models
│       ├── Member.php             # Member model
│       ├── Executive.php          # Executive model
│       ├── Event.php              # Event model
│       └── ...
├── database/
│   ├── migrations/                # Database schema migrations
│   └── seeders/                   # Database seeders
├── resources/
│   ├── views/                     # Blade templates
│   ├── css/                       # Stylesheets
│   └── js/                        # JavaScript files
├── routes/
│   ├── web.php                    # Web routes
│   └── api.php                    # API routes
└── public/
    ├── rsx/                       # Static resources
    └── css/                       # Compiled assets
```

## 🎯 Key Features Breakdown

### Member Management
- **Registration & Authentication**: Secure member registration with student ID validation
- **Profile Management**: Comprehensive profiles with bio, social media, and portfolio links
- **Role-based Access**: Executive positions with admin and reporter privileges

### Event System
- **Event Creation**: Rich event details with date/time scheduling
- **Location Management**: Support for both physical and online events
- **Social Media Integration**: Event sharing and promotion

### Content Management
- **Post System**: Blog-style content with approval workflow
- **Categories**: Organized content categorization
- **Editorial Control**: Admin approval system for quality control

### Achievement Tracking
- **Competition Records**: Track member achievements in competitions
- **Winner Management**: Showcase award winners and recognition
- **Story Documentation**: Record achievement stories and experiences

## 🛠️ Technology Stack

### Backend
- **Framework**: Laravel 10.x
- **Language**: PHP 8.1+
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum

### Frontend
- **Build Tool**: Vite 5.0
- **CSS Framework**: Bootstrap (integrated)
- **JavaScript**: Vanilla JS with modern ES6+

### Development Tools
- **Testing**: PHPUnit
- **Code Quality**: Laravel Pint
- **Package Management**: Composer, npm

## 🔧 Configuration

### Environment Variables
Key environment variables to configure:

```env
APP_NAME="IUT Al-Fazari Interstellar Society"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=iutfis
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 🤝 Contributing

We welcome contributions from the community! Please follow these steps:

1. **Fork the repository**
2. **Create a feature branch** (`git checkout -b feature/amazing-feature`)
3. **Commit your changes** (`git commit -m 'Add amazing feature'`)
4. **Push to the branch** (`git push origin feature/amazing-feature`)
5. **Open a Pull Request**

### Coding Standards
- Follow PSR-12 coding standards
- Use meaningful commit messages
- Write tests for new features
- Update documentation as needed

## 📞 Contact & Social Media

- **Website**: [Coming Soon]
- **LinkedIn**: [IUT Al-Fazari Interstellar Society](https://www.linkedin.com/company/iut-al-fazari-interstellar-society)
- **Email**: [Contact Information]

## 🏛️ About Islamic University of Technology

Islamic University of Technology (IUT) is an international university established under the auspices of the Organization of Islamic Cooperation (OIC), located in Gazipur, Bangladesh.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Founding President**: Rubaiat Rehman Khan
- All members and executives who have contributed to the society
- Islamic University of Technology for their support
- The Laravel community for the excellent framework

---

**"Reach for the stars—literally."** ⭐

*Built with ❤️ by the IUT Al-Fazari Interstellar Society Development Team*