# Screenshot workflow

The dashboard block previews use mobile screenshots below the `md` breakpoint and live Blade previews above it.

Start the local Laravel application, then run:

```sh
npm run screenshots:blocks
```

The script opens Chromium through the DevTools protocol, captures the four dashboard blocks at a 390px viewport and 2x device scale, and writes light and dark PNGs to `public/images/blocks/`.

Useful options:

```sh
npm run screenshots:blocks -- --url http://localhost/blocks/dashboard --width 390 --dpr 2
```

Set `CHROMIUM_BIN` when Chromium is installed outside the common Linux paths. Set `APRIL_SCREENSHOT_CDP_PORT` when the default DevTools port is already in use.
