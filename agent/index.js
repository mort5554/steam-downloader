const express = require('express');
const getInstalledGames = require('./steamScanner');

const app = express();
const PORT = 3000;

app.get('/installed-games', (req, res) => {
  const games = getInstalledGames();
  res.json(games);
});

app.listen(PORT, "100.122.221.128");