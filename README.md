# 🏋️ Aura Gym - E-Commerce Palestra

Sistema e-commerce completo con Frontend React e Backend Laravel API.

## 📁 Struttura Repository

```
aura-gym-front/  (Repository GitHub)
├── backend/         ← Backend Laravel API
│   ├── app/
│   ├── database/
│   ├── routes/
│   └── ...
├── CREDENZIALI.md
└── README.md
```

## 🚀 Setup e Avvio

### Backend Laravel

```bash
cd backend

# Installa dipendenze (solo prima volta)
composer install

# Configura environment
cp .env.example .env
php artisan key:generate

# Setup database e dati
php artisan migrate:fresh --seed --force

# Avvia server
php artisan serve
```

✅ **Backend disponibile su:** `http://localhost:8000`

### Frontend React (repository separato)

Il frontend si trova in un repository/cartella separata: `Aura-Gym-Front`

```bash
cd ../Aura-Gym-Front  # (cartella separata)

# Installa dipendenze (solo prima volta)
npm install

# Crea file .env
echo "VITE_API_URL=http://localhost:8000/api" > .env

# Avvia dev server
npm run dev
```

✅ **Frontend disponibile su:** `http://localhost:5173`

## 🔐 Credenziali Super Admin

**Email:** `admin@auragym.com`  
**Password:** `Admin123!`

## 📊 Dati Precaricati

Il comando `php artisan migrate:fresh --seed` crea automaticamente:

- ✅ **1 Super Admin** (credenziali sopra)
- ✅ **4 Categorie**: Abbigliamento, Integratori, Accessori, Attrezzatura
- ✅ **12 Prodotti** di esempio completi

## 🔗 API Endpoints

### Pubblici (senza autenticazione)
- `GET /api/products` - Lista prodotti con filtri e paginazione
- `GET /api/products/{id}` - Dettaglio prodotto
- `GET /api/categories` - Lista categorie
- `POST /api/orders` - Crea ordine (checkout)

### Protetti (token Sanctum richiesto)
- `POST /api/products` - Crea prodotto
- `PUT /api/products/{id}` - Aggiorna prodotto
- `DELETE /api/products/{id}` - Elimina prodotto
- `GET /api/orders` - Lista ordini
- `GET /api/orders/{id}` - Dettaglio ordine

## 🎯 Funzionalità Backend

✅ **API REST complete** con validazione
✅ **Gestione Prodotti** (CRUD completo)
✅ **Gestione Categorie** (CRUD completo)
✅ **Gestione Ordini** con calcolo automatico
✅ **Autenticazione** Laravel Sanctum
✅ **CORS** configurato per frontend
✅ **Gestione Stock** automatica
✅ **Calcolo IVA** (22%) automatico
✅ **Database Seeders** con dati esempio

## 🛠️ Tecnologie

- **Laravel 12** (Framework PHP)
- **PHP 8.2+**
- **Laravel Sanctum** (API Authentication)
- **SQLite** (Database - facilità sviluppo)
- **Eloquent ORM**

## 📝 Struttura Database

### Tabelle

- `users` - Utenti/Admin del sistema
- `categories` - Categorie prodotti
- `products` - Prodotti in vendita
- `orders` - Ordini clienti
- `order_items` - Dettagli articoli ordinati
- `personal_access_tokens` - Token API Sanctum

### Relazioni

- Product → Category (belongsTo)
- Order → User (belongsTo)  
- Order → OrderItems (hasMany)
- OrderItem → Product (belongsTo)

## ⚙️ Configurazione

### File .env principale

```env
APP_NAME=AuraGym
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite

FRONTEND_URL=http://localhost:5173
```

### CORS

Già configurato per accettare richieste da:
- `http://localhost:5173` (Vite dev)
- `http://localhost:3000`

## 🧪 Test API

```bash
# Lista prodotti
curl http://localhost:8000/api/products

# Lista categorie
curl http://localhost:8000/api/categories

# Dettaglio prodotto
curl http://localhost:8000/api/products/1
```

## 📦 Comandi Utili

```bash
# Reset database con dati
php artisan migrate:fresh --seed --force

# Lista routes API
php artisan route:list --path=api

# Pulisci cache
php artisan optimize:clear

# Crea nuovo controller API
php artisan make:controller Api/NomeController --api

# Crea model con migration
php artisan make:model NomeModello -m
```

## 🌐 Deploy Produzione

### Preparazione

```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment

- Cambia `APP_ENV=production`
- Cambia `APP_DEBUG=false`
- Configura database produzione
- Aggiorna `FRONTEND_URL` con dominio reale

## 📄 Licenza

Progetto privato - Aura Gym

## 👨‍💻 Supporto

Per problemi o domande, contatta il team di sviluppo.

---

**Versione**: 1.0.0  
**Ultimo aggiornamento**: 14 Novembre 2025  
**Repository**: https://github.com/MarcoMarella/Aura-Gym-Front
