# Laravel : Gestion des tags

## Description

## Code

Nous avons utilisé la librairie Select2 pour rendre l'input du tag dynamique. Il faudra donc l'importer sur le projet et le configurer.

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

Affichage au niveau du controlleur 

```php
public function index(){
    $my_tags = Tag::all();

    $tag_array[] = null;
    foreach ($my_tags as $key => $tag) {
        array_push($tag_array, array('id' => $tag->id, 'text' => $tag->name));
    }
    $tags = "<script> var data = ".json_encode($tag_array)." </script>";

    return view('1 Quotes.index', compact('tags'));
}
```


Affichage coté Coté HTML

```html
<div class="form-group col-md-6">
    <label>Tags</label>
    {!! $tags !!}
    <select name="tag[]" multiple class="form-control select2" style="width: 100%">
    </select>
</div>
```

Stokage au niveau du controleur 

```php
$tag_list[] = null;

if ($request->tag) {
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
}

$input = $request->all();
$input['tag'] = json_encode($tag_list);
```
