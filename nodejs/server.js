const express = require("express");
const path = require("path");
const app = express();

// Untuk menyajikan file statis seperti HTML, CSS, dan JS
app.use(express.static(path.join(__dirname, "public")));

app.listen(3000, () => {
    console.log("Server berjalan di http://localhost:3000");
});
