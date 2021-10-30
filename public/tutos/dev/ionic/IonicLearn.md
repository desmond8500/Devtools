# Ionic 4

### Get Started
```
ionic start
```

### Change text with a button
In the html file :
```html
<ion-content>
  <p>{{ text }}</p>
  <ion-button (click)='onChangeText()'>ChangeText</ion-button>
</ion-content>
```

In the typescript file
```ts
text ="Hello";
onChangeText(){
  this.text ="hello world !!";
}
```

### transform Simple html file to ionic app
use
```html
<script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>
<link href="https://unpkg.com/@ionic/core@latest/css/ionic.bundle.css" rel="stylesheet">
```


### Publish Ionic app with capacitor
We have to build the app first
```
ng build
```
then we create the android project
```
ionic capacitor add android
ionic capacitor copy android
```
to lauch the app do
```
ionic capacitor run android
```

### After cloning a repo
do
```
npm install
```
In oder to install dépendencies

### css
#### Define
To set global variables css go to **src/theme/variables.scss** and set the background
```
--ion-background-color: #ff3700;
```
### Http requests
1. Create a service
```
ionic g service data
```
2. Import the service into the **ts file** of the page, in this case the file is in a subfolder **service**
```
import { UsersService } from '../../service/data.service';
```
3. in the data service file
```
import { HttpClient } from '@angular/common/http';
```


### Create and use a class
```
ionic g class class/test
```
it's contents
```
export class Ticket {
  constructor(
    public id: string = "A0000",
    public name: string = "hello" ,
    public date: string = "27/05/2019" ,
    public etat: string = "actif" ,
    public caisse: string = "03" ,
  ){}
}
```

### modals
Create the modal
```
ionic g page mymodal
```
add it into the app.modules
```
import { MymodalPageModule } from './pages/mymodal/mymodal.module';


imports: [
    TicketPageModule
  ],
```
and into the calling page
```
import { MymodalPage} from '../mymodal/mymodal.page';

constructor(public modalController: ModalController) {}

  async appelerModal()  {
      const modal = await this.modalController.create({
       component: MymodalPage
     });
     return await modal.present();
    }
```

### ionic storage


### ionic deploy
```
cordova platform add android --save
```

### Search filter
create a service
```
import { Injectable } from "@angular/core";

@Injectable({
  providedIn: "root"
})
export class DataService {
  public items: any = [];

  constructor() {
    this.items = [
      { title: "one" },
      { title: "two" },
      { title: "three" },
      { title: "four" },
      { title: "five" },
      { title: "six" }
    ];
  }

  filterItems(searchTerm) {
    return this.items.filter(item => {
      return item.title.toLowerCase().indexOf(searchTerm.toLowerCase()) > -1;
    });
  }
}
```
into the ts file
```
import { Component, OnInit } from "@angular/core";
import { DataService } from "../services/data.service";

@Component({
  selector: "app-home",
  templateUrl: "home.page.html",
  styleUrls: ["home.page.scss"]
})
export class HomePage implements OnInit {
  public searchTerm: string = "";
  public items: any;

  constructor(private dataService: DataService) {}

  ngOnInit() {
    this.setFilteredItems();
  }

  setFilteredItems() {
    this.items = this.dataService.filterItems(this.searchTerm);
  }
}
```
and finnaly into the html file
```

```
