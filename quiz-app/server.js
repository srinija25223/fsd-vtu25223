const express = require("express");
const bodyParser = require("body-parser");
const sqlite3 = require("sqlite3").verbose();

const app = express();
const db = new sqlite3.Database("./quiz_results.db");

db.serialize(() => {
  db.run("CREATE TABLE IF NOT EXISTS scores (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, score INTEGER, date TEXT, q1 TEXT, q2 TEXT, q3 TEXT, q4 TEXT, q5 TEXT, q6 TEXT, q7 TEXT, q8 TEXT, q9 TEXT, q10 TEXT)");
});

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static("."));

app.post("/submit", (req, res) => {
  let score = 0;
  if (req.body.q1 == "b") score++;
  if (req.body.q2 == "a") score++;
  if (req.body.q3 == "c") score++;
  if (req.body.q4 == "b") score++;
  if (req.body.q5 == "d") score++;
  if (req.body.q6 == "a") score++;
  if (req.body.q7 == "c") score++;
  if (req.body.q8 == "b") score++;
  if (req.body.q9 == "d") score++;
  if (req.body.q10 == "a") score++;

  let name = req.body.username || "Participant";
  let date = new Date().toLocaleDateString();

  db.run("INSERT INTO scores (name, score, date, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
    [name, score, date, req.body.q1, req.body.q2, req.body.q3, req.body.q4, req.body.q5, req.body.q6, req.body.q7, req.body.q8, req.body.q9, req.body.q10], 
    (err) => {
    if (err) return console.error(err.message);
  });

  res.send(`
    <!DOCTYPE html>
    <html>
    <head><title>Certificate</title></head>
    <body>
      <div style="text-align:center; border:10px solid gold; padding:40px; width:800px; margin:auto;">
        <h1>Certificate of Completion</h1>
        <p>This certificate is proudly presented to</p>
        <h2>${name}</h2>
        <h3>Score : ${score} / 10</h3>
        <p>Date : ${date}</p>
        <button onclick="window.print()">Download Certificate</button>
      </div>
    </body>
    </html>
  `);
});

app.listen(3000, () => {
  console.log("Server running at http://localhost:3000");
});
