Here’s the updated README in plain text using Markdown format:

```markdown
# ![Icon](src/icon.svg) Smart Image Hotspots

> Smart Image Hotspots is a Statamic addon that allows you to add hotspots to images.

## Features
This addon provides the following features:
- Save hotspot positions in percentages for absolute positioning usage
- Supports SVG images
- Antlers tag to access hotspots in your templates
- **GraphQL support** for querying image hotspots data

## How to Install
You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

```bash
composer require emran-alhaddad/smart-image-hotspots
```

## How to Use

### Setup Fields
Add an `Image Hot Spots` field and configure the required asset `Container` setting.

![Image Hot Spots Field](fieldType.png)

### Usage
1. Add an image to the `Assets` field.
2. Click the `Refresh Image` button.
3. Click the `Add Hotspot` button.
4. Click and drag the hotspot to the desired position.
5. Add a description for the hotspot.

![Image Hot Spots Field](fields.png)
**Note:** Hotspots cannot be placed in the red border area to prevent breaking the page bounds at certain sizes.

### Front End Templating Example
This example uses Tailwind, Alpine.js, and the X-anchor Alpine.js plugin. The `{{ image_hot_spots }}{{ /image_hot_spots }}` tag pair is used to loop through the hotspots, and the `{{ hotspots }}{{ /hotspots }}` tag pair is used to access the hotspot data.

```html
<section>
  {{ image_hot_spots field="image_hot_spots_field" }}
    <div class="relative">
      <img src="{{glide :src="image.url" w=1280}}" class="w-full" alt="{{image.alt}}">

      {{ hotspots }}
        <div
          x-data="{ open: false }"
          class="absolute"
          style="top: {{y}}%; left: {{x}}%; transform: translate(-12px, -12px);"
          @mouseOver="open = true"
          @mouseLeave="open = false"
        >
          <div
            class="w-8 h-8 bg-blue-500 border-white border-2 rounded-full
              flex justify-center items-center text-xs text-white font-bold cursor-pointer"
            x-ref="button"
          >
            {{svg src="heroicons/solid/plus.svg" class="size-6"}}
          </div>

          {{# tooltip #}}
          <div
            class="bg-black p-4 shadow-lg w-64 text-white z-10"
            x-cloak
            x-show="open"
            x-anchor.offset.5="$refs.button"
          >
            {{ content }}
          </div>
        </div>
      {{ /hotspots }}
    </div>
  {{ /image_hot_spots }}
</section>
```

**Note:** The `-translate-x` and `-translate-y` classes are used to center the hotspots accurately and help prevent the hotspots from breaking the page bounds.

![Image Hot Spots Front End Example](imageHotspots.png)

## GraphQL Support
This addon includes GraphQL support, allowing you to query image hotspot data dynamically.

### Example GraphQL Query
Here’s an example of a GraphQL query to fetch hotspot data:

```graphql
{
  imageHotspots {
    imageFile {
      url
      id
      fileName
      alt
    }
    hotspots {
      x
      y
      content
    }
  }
}
```

### Example Response
```json
{
  "data": {
    "imageHotspots": {
      "imageFile": {
        "url": "https://example.com/image.png",
        "id": "assets::example/image.png",
        "fileName": "image.png",
        "alt": "An example image"
      },
      "hotspots": [
        {
          "x": 54.97,
          "y": 49.47,
          "content": "Example content 1"
        },
        {
          "x": 26.66,
          "y": 69.66,
          "content": "Example content 2"
        }
      ]
    }
  }
}
```

With this feature, you can easily integrate your image hotspots into dynamic GraphQL-based frontends or APIs.
```