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

## Contributing

Contributions are welcome! If you have any suggestions, bug reports, or feature requests, please open an issue or submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
