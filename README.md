## <h1 align="center">Landing Page Generator</h1>
The Landing Page Generator is a tool designed to simplify the creation of landing pages without requiring in-depth technical knowledge. This project provides various features to help users design functional and appealing landing pages.

## Key Features

- Customizable landing page templates.
- Drag-and-drop editor for easy page creation.
- Dashboard to manage landing page projects.
- Integration with marketing tools like Google Analytics.

## System Requirements

- PHP >= 7.4
- Composer
- Web server (e.g., Apache/Nginx)
- MySQL/MariaDB database

## Installation

### 1. Clone the repository:
```bash
git clone https://github.com/adfity/landify.git 
cd landing-page-generator  
```

### 2. Install dependencies:
```bash
composer install
```

### 3. Configure the environment
- Copy the .env.example file to .env:
```bash
cp .env.example .env  
```
- Update the .env file with your database and environment settings.

### 4. Generate the application key:
```bash
php artisan key:generate
```

### 5. Run migrations and seed the database:
```bash
php artisan migrate --seed
```

### 6. Start the local development server:
```bash
php artisan serve
```

### 7. Access the application:
Open your browser and go to http://localhost:8000.

## Usage

- Sign up or log in to the application.
- Choose a landing page template that fits your needs.
- Use the drag-and-drop editor to customize the page.
- Save and manage your projects through the dashboard.

## Contributing
We welcome contributions! Please fork the repository, create a new branch, and submit a pull request.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
