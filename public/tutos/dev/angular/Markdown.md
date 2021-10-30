# NGX Markdown

[Source](https://www.npmjs.com/package/ngx-markdown)

## Installation

```cli
  npm install ngx-markdown --save
```

## Utilisation

### Html

```html
  <markdown [src]="'assets/markdown/test.md'"></markdown>
```

### App-modules.Module

```typescript
import { HttpClientModule } from '@angular/common/http';
import { MarkdownModule } from 'ngx-markdown';


imports: [
    HttpClientModule,
    MarkdownModule.forRoot(),
  ],
```

### Angular.json

```json
"scripts": [
  "node_modules/marked/lib/marked.js"
]
```
