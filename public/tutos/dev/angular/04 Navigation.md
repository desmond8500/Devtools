# Navigation

## Navigation entre deux pages

Page 1 

```html
<button (click)="consulter(id)">Page suivante</button>
```
```ts
constructor(private route: Router, private service: ServiceService) { }

consulter(id){
    this.service.setId(id);
}
```

Service 

```ts
constructor(private route: Router, private http: HttpClient) { }
setIdd(id){
    this.userId = id;
    this.router.navigate(['/userinfo']);

  }
  getuser(){
    return this.http.get(this.server + 'api/getuser/' + this.userId);
  }
```

