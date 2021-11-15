const { zip } = require('zip-a-folder');
const path = require('path');

async function main() {
	await zip( path.join( __dirname, '../src' ), path.join( __dirname, '../cjenolovac-mods.zip' ) );
}

main();
