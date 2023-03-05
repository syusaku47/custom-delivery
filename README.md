# custom-delivery
ECサイトで使用される配送日の表示、制御ポートフォリオ

環境構築
バックエンドソース  
git clone https://github.com/syusaku47/custom-delivery.git    
cp .env.example .env  
php artisan migrate:fresh --seed  
php artisan serve  

フロントソース  
git clone https://github.com/syusaku47/custom-delivery-client.git  
npm run dev  

ブラウザ表示  
http://localhost:3000/  

