# Select 2

## Description

C'est une librairie Javascript qui permet de faire des types de select assez stylisés


## Installation

Vous pouvez utiliser le CDN

```html
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
```

## Utilisation avec un select 

Dans le controlleur d'affichage: 

```php
 $citation_tags = Tag::all();

$tag_array[] = null;
foreach ($citation_tags as $key => $tag) {
    array_push($tag_array, array('id' => $tag->id, 'text' => $tag->name));
}
$tags = "<script> var data = ".json_encode($tag_array)." </script>";
```

Dans le fichier html: 

```html
<div class="form-group col-md-6">
    <label>Tags</label>
    {!! $tags !!}
    <select name="tag[]" multiple class="form-control select2" style="width: 100%">
    </select>
</div>
```

Dans le fihcier js de configuration de Select2 : 

```js
$(document).ready(function () {
    $('.select2').select2({
        placeholder: 'Selectionnez un tag',
        allowClear: true,
        tags: true,
        tokenSeparators: [',', ' '],
        data: data
    });
});
```

Dans le controlleur de stockage : 

```php
$tag_list[] = null;
foreach ($request->tag as $key => $tag) {
    if (!is_numeric($tag)) {
        $new_tag = new Tag();
        $new_tag->name = $tag;
        $new_tag->save();
        $tag = $new_tag->id;
    }
    array_push($tag_list, $tag);
}
array_shift($tag_list);

$input = $request->all();
$input['tag'] = json_encode($tag_list);

$citation = $this->citationRepository->create($input);

Flash::success('Citation saved successfully.');
```

## Source

* [Select2.org](https://select2.org/)
