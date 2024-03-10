# Web Scraping Application

This is a PHP-based web scraping application that fetches data from a specified website and extracts relevant information such as article titles, URLs, dates, and article bodies.

## Features

- **Scraping Links**: The application scrapes links from a provided sitemap URL.
- **Extracting Article Information**: It extracts article titles, URLs, dates, and article bodies from the scraped links.
- **Processing Content**: Content processing functions are included to clean up and format the extracted data.
- **JSON Output**: The application outputs the extracted data in both HTML format and as a JSON file.
- **README**: This README provides an overview of the application and its features.

## Installation

1. Clone the repository: `git clone <repository_url>`
2. Navigate to the project directory: `cd web-scraping-application`

## Usage

1. Ensure PHP is installed on your system.
2. Run `index.php` in a PHP-enabled server environment (e.g., XAMPP, WAMP, or any other local server setup).
3. Access the application through a web browser.
4. The application will scrape links from a sitemap URL and extract relevant information from those links.
5. The extracted data will be displayed in the browser and saved as a JSON file.

## File Structure

- `index.php`: Main file that orchestrates the web scraping process and generates the output.
- `Functions/`: Directory containing PHP functions for scraping, processing content, and formatting data.
- `README.md`: Documentation file providing information about the application.

## Dependencies

- PHP 7.x
- cURL extension enabled

## Screen-shoot on how data is returned in the browser

![image](https://github.com/TheMrM/PhP-WebScraper/assets/128375812/1d008b6c-7e48-4d90-b4e6-d437e2c1681e)
![image](https://github.com/TheMrM/PhP-WebScraper/assets/128375812/5c2fcdc7-3c6e-4899-8c84-be455aa5a5b3)
![image](https://github.com/TheMrM/PhP-WebScraper/assets/128375812/7c13b1f8-6ef5-4826-af17-bc83c01a4bfd)

## Screen-shoot on how data is returned in JSON file

![image](https://github.com/TheMrM/PhP-WebScraper/assets/128375812/e44aec5f-0067-4d74-9bab-67e01f2f8d97)


## Contributing

Contributions are welcome! If you have any suggestions, bug reports, or feature requests, please open an issue or submit a pull request.
