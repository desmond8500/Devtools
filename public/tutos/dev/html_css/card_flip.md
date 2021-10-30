# Card Flip

## Description

Permet de retourner une carte losqu'on la survolle avec la souris. C'est fait en CSS.

## Usage

[Source](https://www.codeply.com/go/roydoXgaLr/bootstrap-4-flip-cards)

```html
<div class="card card-flip ">
    <div class="card-front text-white bg-dark">
        <div class="card-body">
            <i class="fa fa-search fa-5x float-right"></i>
            <h3 class="card-title">Front</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
    <div class="card-back bg-white">
        <div class="card-body">
            <h3 class="card-title">Back</h3>
            <p class="card-text">Suprise this one has more more more more content on the back!</p>
            <a href="#" class="btn btn-outline-secondary">Action</a>
        </div>
    </div>
</div>
```

```css

/*
flip card
*/
.card-flip > div {
    backface-visibility: hidden;
    transition: transform 300ms;
    transition-timing-function: linear;
    width: 100%;
    height: 100%;
    margin: 0;
    display: flex;
  }

  .card-front {
    transform: rotateY(0deg);
  }

  .card-back {
    transform: rotateY(180deg);
    position: absolute;
    top: 0;
  }

  .card-flip:hover .card-front {
    transform: rotateY(-180deg);
  }

  .card-flip:hover .card-back {
    transform: rotateY(0deg);
  }

```
