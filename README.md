# 專案安裝與運行指南

## 安裝

1. **克隆專案**
   ```sh
   git clone https://github.com/WangPinChen/currency-converter.git
   cd currency-converter
   ```

2. **安裝相依套件**
   ```sh
   composer install
   ```

## 運行專案

1. **啟動內建伺服器**
   ```sh
   php artisan serve --port=8000
   ```
   預設會在 `http://localhost:8000` 運行專案。

2. **確認專案是否正常運行**
   瀏覽器開啟 `http://localhost:8000`，應該會看到 Laravel 預設首頁。

## 使用 /api-doc 進行測試

1. **開啟 API 文件**
   確保專案已運行，然後在瀏覽器輸入：
   ```
   http://localhost:8000/api-doc
   ```
   這將會載入 Swagger UI，並顯示可用的 API 端點。

2. **測試 API**
   - 選擇 API 端點
   - 填寫必要的參數
   - 點擊 `Send API Request` 執行 API 請求
   - 查看回應結果

