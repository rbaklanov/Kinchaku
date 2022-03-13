### Launch project locally:
- Clone project `git clone https://github.com/rbaklanov/Kinchaku.git`
- Build Docker container `docker-compose up -d --build`
- Prepare environment `cp .env.example .env`
- Build backend dependencies `composer i`
- Build frontend dependencies `npm ci`
- Run migrations `php artisan migrate`
- Project should be available at `http://localhost:5000` 

