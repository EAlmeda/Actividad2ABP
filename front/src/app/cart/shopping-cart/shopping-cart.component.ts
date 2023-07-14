import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-shopping-cart',
  templateUrl: './shopping-cart.component.html',
  styleUrls: ['./shopping-cart.component.scss']
})
export class ShoppingCartComponent implements OnInit {

  shoppingCartItems: any[]= [{
    name: 'Gyozas de pollo',
    amount: 12,
    price: 12
  }];

  constructor() { }

  ngOnInit(): void {
  }

}
