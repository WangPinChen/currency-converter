# Project Installation and Setup Guide

## Installation

1. **Clone the Project**
   ```sh
   git clone https://github.com/WangPinChen/currency-converter.git
   cd currency-converter
   ```

2. **Install Dependencies**
   ```sh
   composer install
   ```

3. **Set up the Environment File (.env)**
   ```sh
   cp .env.example .env
   ```

4. **Generate Application Key**
   ```sh
   php artisan key:generate
   ```
## Running the Project

1. **Start the Built-in Server**
   Access the API Documentation Ensure the project is running, and then open your browser and navigate to: 
   
   ```
   http://localhost:8000/api-doc`
   ``

   This will load the Swagger UI and display the available API endpoints.

2. **Test with /api-doc**
   - Select an API endpoint
   - Fill in the required parameters
   - Click Send API Request to execute the API request
   - Review the response results
