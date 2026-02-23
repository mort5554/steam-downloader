const fs = require('fs');
const path = require('path');
const vdf = require('vdf');

const steamPath = "C:/Program Files (x86)/Steam/steamapps";

function getInstalledGames() {
  const files = fs.readdirSync(steamPath)
    .filter(f => f.startsWith("appmanifest_") && f.endsWith(".acf"));

  let games = [];

  files.forEach(file => {

    const fullPath = path.join(steamPath, file);
    const content = fs.readFileSync(fullPath, 'utf8');
    const parsed = vdf.parse(content);

    const app = parsed.AppState;

    games.push({
      appid: app.appid,
      name: app.name,
      installdir: app.installdir,
      size: app.SizeOnDisk,
      lastPlayed: app.LastPlayed
    });

  });

  return games;
}

module.exports = getInstalledGames;