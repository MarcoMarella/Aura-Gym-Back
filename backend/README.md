# Aura Gym - Backend API

Backend Laravel per il gestionale e-commerce Aura Gym.

## 🚀 Installazione e Setup

### Prerequisiti
- PHP >= 8.2
- Composer
- MySQL o SQLite (configurato di default)

### Installazione

1. Installa le dipendenze:
```bash
composer install
```

2. Configura l'ambiente:
```bash
cp .env.example .env
php artisan key:generate
```

3. Esegui le migrazioni:
```bash
php artisan migrate
```

4. Popola il database con dati di esempio:
```bash
php artisan db:seed
```

### Avvio del Server

```bash
php artisan serve
```

Il backend sarà disponibile su: `http://localhost:8000`

## 📚 API Endpoints

### Prodotti
- `GET /api/products` - Lista prodotti (pubblico)
- `GET /api/products/{id}` - Dettaglio prodotto (pubblico)
- `POST /api/products` - Crea prodotto (autenticato)
- `PUT /api/products/{id}` - Aggiorna prodotto (autenticato)
- `DELETE /api/products/{id}` - Elimina prodotto (autenticato)

### Categorie
- `GET /api/categories` - Lista categorie (pubblico)
- `GET /api/categories/{id}` - Dettaglio categoria (pubblico)
- `POST /api/categories` - Crea categoria (autenticato)
- `PUT /api/categories/{id}` - Aggiorna categoria (autenticato)
- `DELETE /api/categories/{id}` - Elimina categoria (autenticato)

### Ordini
- `POST /api/orders` - Crea ordine (pubblico)
- `GET /api/orders` - Lista ordini (autenticato)
- `GET /api/orders/{id}` - Dettaglio ordine (autenticato)
- `PUT /api/orders/{id}` - Aggiorna ordine (autenticato)
- `DELETE /api/orders/{id}` - Elimina ordine (autenticato)

## 🔧 Parametri Query per Prodotti

```
GET /api/products?category_id=1&is_featured=1&search=shirt&sort_by=price&sort_order=asc&per_page=20
```

- `category_id` - Filtra per categoria
- `is_featured` - Filtra prodotti in evidenza (0/1)
- `is_active` - Filtra prodotti attivi (0/1)
- `search` - Ricerca nel nome e descrizione
- `sort_by` - Campo ordinamento (created_at, price, name)
- `sort_order` - Direzione ordinamento (asc, desc)
- `per_page` - Numero risultati per pagina

## 🗄️ Struttura Database

### Tabelle Principali

#### products
- id, category_id, name, slug, description
- price, sale_price, stock
- image, images (JSON), is_active, is_featured
- timestamps

#### categories
- id, name, slug, description
- timestamps

#### orders
- id, user_id, order_number
- customer_name, customer_email, customer_phone
- shipping_address, shipping_city, shipping_state, shipping_zip, shipping_country
- subtotal, shipping_cost, tax, total
- status, payment_status, payment_method, notes
- timestamps

#### order_items
- id, order_id, product_id
- product_name, price, quantity, subtotal
- timestamps

## 🔐 Autenticazione

Il backend utilizza Laravel Sanctum per l'autenticazione API.

### Utente Admin di Default
- Email: `admin@auragym.com`
- Password: `password`

## 🌐 CORS

Il backend è configurato per accettare richieste da:
- `http://localhost:5173` (Vite dev server)
- `http://localhost:3000`

Per aggiungere altre origini, modifica `/config/cors.php`

## 📦 Dati di Esempio

Il database viene popolato con:
- 4 categorie (Abbigliamento, Integratori, Accessori, Attrezzatura)
- 12 prodotti di esempio
- 1 utente admin

## 🛠️ Comandi Utili

```bash
# Reset database e seeders
php artisan migrate:fresh --seed

# Creare un nuovo controller API
php artisan make:controller Api/NomeController --api

# Creare un nuovo modello con migrazione
php artisan make:model NomeModello -m

# Visualizzare routes
php artisan route:list

# Pulire cache
php artisan cache:clear
php artisan config:clear
```

## 📝 Note Tecniche

- Laravel 12.x
- Database: SQLite (di default) o MySQL
- API REST con risposte JSON
- Validazione automatica delle richieste
- Gestione automatica stock prodotti
- Calcolo automatico IVA (22%)
- Generazione automatica numeri ordine

## 🔗 Collegamento con Frontend

Il frontend React in `Aura-Gym-Front` è già configurato per connettersi a questo backend.

Assicurati che:
1. Il backend sia avviato su `http://localhost:8000`
2. Il frontend abbia la variabile `VITE_API_URL=http://localhost:8000/api` nel file `.env`
