# 🔐 Credenziali Aura Gym

## Super Admin

**Email:** `admin@auragym.com`  
**Password:** `Admin123!`

## 🚀 Avvio Sistema

### Backend
```bash
cd backend
php artisan serve
```
Server disponibile su: `http://localhost:8000`

### Frontend  
```bash
cd Aura-Gym-Front  
npm run dev
```
Frontend disponibile su: `http://localhost:5173`

## 📊 Database

- **Admin User**: Creato automaticamente con i seeders
- **Prodotti**: 12 prodotti di esempio
- **Categorie**: 4 categorie (Abbigliamento, Integratori, Accessori, Attrezzatura)

## 🔗 API Endpoints

- `GET /api/products` - Lista prodotti
- `GET /api/categories` - Lista categorie  
- `POST /api/orders` - Crea ordine

### Endpoint Protetti (richiedono autenticazione)
- `POST /api/products` - Crea prodotto
- `PUT /api/products/{id}` - Aggiorna prodotto
- `DELETE /api/products/{id}` - Elimina prodotto

## ⚙️ Configurazione

Il frontend è già configurato per connettersi al backend su `http://localhost:8000/api`

