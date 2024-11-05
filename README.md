## About Hospital Management System

The Hospital Management System (HMS) is designed to streamline the day-to-day operations of a small clinic.
It includes functionality for patient registration, doctor assignment, medication dispensing, and managing patient medical records. 
This system is built using the Laravel framework, providing a user-friendly and efficient interface for hospital staff.

## Installation Instructions

### 1. Clone the repository:
 
    git clone https://146.64.52.113/AMbadaliga/laravel-project.git
   
### 2. Navigate to the project directory

    cd cd hospital-management-system
   
### 3. Install dependencies
    composer install
    npm install
    
### 4. Copy the .env file
    cp .env.example .env
    
### 5. Generate an application key
    php artisan key:generate
    
### 6. Set up the database connection in the .env file. Run the Migrations first.
    php artisan migrate

###7. Start the development server
    php artisan serve

## Usage Guide
1. Patient Management: The admin has to be authenticated then Register and manage patient information.
2. Doctor Assignment: The admin can Assign doctors to patients based on their medical needs.
3. Medication Records: The admin can Manage medications and assign them to patients.


## Configurations
1. Ensure your .env file is properly configured with your database, mail, and other application settings.


## Contributing

I welcome contributions! To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Submit a pull request with a detailed description of the changes.

## Contact Information or Support Channels
For any questions or support, please reach out via:

Email: ambdaliga@csir.co.za

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# Laravel_HMS
