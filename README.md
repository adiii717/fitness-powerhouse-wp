# Fitness Power House - WordPress Theme

A premium WordPress theme for gym and fitness equipment e-commerce stores. Features a modern design with mega menus, product sliders, and WooCommerce compatibility.

## Features

- **Modern Design**: Clean, professional design inspired by premium e-commerce sites
- **Mega Menus**: Image-based dropdown menus for categories
- **Hero Slider**: Customizable banner slider with autoplay
- **Product Sections**: Featured products and best sellers with slider/grid layouts
- **WooCommerce Ready**: Full WooCommerce compatibility
- **Responsive**: Mobile-first responsive design
- **Customizer Options**: Easy customization through WordPress Customizer
- **WhatsApp Integration**: Floating WhatsApp button for customer support
- **SEO Optimized**: Clean, semantic HTML5 markup

## Requirements

- WordPress 6.0 or higher
- PHP 8.0 or higher
- WooCommerce 8.0+ (optional, for e-commerce features)

## Quick Start with Docker

### Prerequisites

- Docker and Docker Compose installed
- Git

### Installation

1. Clone the repository:
```bash
git clone https://github.com/adiii717/fitness-powerhouse-wp.git
cd fitness-powerhouse-wp
```

2. Start the Docker containers:
```bash
docker-compose up -d
```

3. Access the site:
   - **WordPress**: http://localhost:8080
   - **phpMyAdmin**: http://localhost:8081

4. Complete WordPress installation through the browser

5. Go to **Appearance > Themes** and activate "Fitness Power House"

### Docker Services

| Service | Port | Description |
|---------|------|-------------|
| WordPress | 8080 | Main WordPress site |
| MySQL | 3306 | Database server |
| phpMyAdmin | 8081 | Database management |

### Default Credentials

**Database:**
- Host: mysql
- Database: wordpress
- User: wordpress
- Password: wordpress_secret

**MySQL Root:**
- Password: root_secret

## Theme Customization

### Customizer Options

Navigate to **Appearance > Customize** to access:

1. **Theme Options > Header Settings**
   - Phone number
   - WhatsApp number

2. **Theme Options > Hero Slider**
   - Hero images (3 slides)
   - Slide titles and subtitles
   - Button URLs

3. **Theme Options > Social Links**
   - Facebook, Instagram, Twitter, YouTube, LinkedIn URLs

### Menu Setup

1. Go to **Appearance > Menus**
2. Create a menu and assign it to "Primary Menu"
3. Use mega menu by adding nested menu items

### WooCommerce Setup

1. Install WooCommerce plugin
2. Run the WooCommerce setup wizard
3. Add products to see them in the theme

## File Structure

```
fitness-powerhouse-wp/
├── docker-compose.yml
├── README.md
├── wp-content/
│   ├── themes/
│   │   └── fitness-powerhouse/
│   │       ├── style.css
│   │       ├── functions.php
│   │       ├── header.php
│   │       ├── footer.php
│   │       ├── index.php
│   │       ├── front-page.php
│   │       ├── inc/
│   │       │   └── template-tags.php
│   │       └── assets/
│   │           ├── css/
│   │           ├── js/
│   │           │   └── main.js
│   │           └── images/
│   │               ├── hero/
│   │               ├── products/
│   │               ├── categories/
│   │               └── brands/
│   └── uploads/
```

## Development

### Stop containers:
```bash
docker-compose down
```

### Stop and remove volumes:
```bash
docker-compose down -v
```

### View logs:
```bash
docker-compose logs -f wordpress
```

### Access container shell:
```bash
docker-compose exec wordpress bash
```

## Theme Screenshots

The theme includes:
- Top benefits bar (Free Delivery, Warranty, etc.)
- Sticky header with search and cart
- Category mega menus with images
- Hero slider with CTA buttons
- Category shortcuts with circular icons
- Product sliders and grids
- Promotional banner sections
- Brand showcase
- Dark footer with newsletter
- WhatsApp floating button

## License

GPL v2 or later - see style.css for details

## Credits

- Images: [Unsplash](https://unsplash.com) (Open Source)
- Icons: Custom SVG icons
- Fonts: Google Fonts (Outfit, Plus Jakarta Sans)

## Support

For issues and feature requests, please use the GitHub issue tracker.
