const path = require('path');

module.exports = {
	prefix: 'hw-',
	content: [
		path.join(__dirname, './src/Views/public/**/*.php'),
		path.join(__dirname, './src/Views/public/*.php'),
		path.join(__dirname, './assets/dev/public/**/*.js')
	],
	theme: {
		spacing: {
			px: '1px',
			0: '0',
			0.5: '2px',
			1: '4px',
			1.5: '6px',
			2: '8px',
			2.5: '10px',
			3: '12px',
			3.5: '14px',
			4: '16px',
			5: '20px',
			6: '24px'
		}
	},
	variants: {},
	plugins: []
}
