import { defineConfig } from "vite";

export default defineConfig(({command, mode}) => {
	if (mode === "production") {
		return build();
	}
	return dev();
});


function build() {
	return {
		build: {
			assetsDir: "assets",
			emptyOutDir: true,
			manifest: false,
			outDir: "assets/dist",
			rollupOptions: {
				input: {
					"admin": `assets/dev/admin/js/admin.js`,
					"public": `assets/dev/public/js/public.js`
				},
				output: {
					entryFileNames: `[name].js`,
					assetFileNames: (assetInfo) => {
						return `[name][extname]`
					}
				}
			},
		},
		plugins: [
			{
				name: "php",
				handleHotUpdate({ file, server }) {
					if (file.endsWith(".php")) {
						server.ws.send({ type: "full-reload", path: "*" });
					}
				},
			},
		],
	}
}

function dev() {
	return {
		build: {
			assetsDir: "assets",
			emptyOutDir: true,
			manifest: true,
			outDir: "assets/dist",
			rollupOptions: {
				input: {
					"admin": `assets/dev/admin/js/admin.js`,
					"public": `assets/dev/public/js/public.js`
				},
				output: {
					entryFileNames: `[name].js`,
					assetFileNames: (assetInfo) => {
						return `[name][extname]`
					}
				}
			},
		},
		plugins: [
			{
				name: "php",
				handleHotUpdate({ file, server }) {
					if (file.endsWith(".php")) {
						server.ws.send({ type: "full-reload", path: "*" });
					}
				},
			}
		],
	}
}
