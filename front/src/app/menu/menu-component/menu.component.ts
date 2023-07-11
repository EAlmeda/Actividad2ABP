import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss']
})
export class MenuComponent implements OnInit {

  products: any[] = [{
    name: "Pizza marinara",
    type: "Dish",
    available: true,
    description: "Pizza con mariscos varios."
  }, {
    name: "Pizza marinara",
    type: "Drink",
    available: true,
    description: "Pizza con mariscos varios."
  }, {
    name: "Pizza marinara",
    type: "Drink",
    available: false,
    description: "Pizza con mariscos varios."
  }, {
    name: "Pizza marinara",
    type: "Drink",
    available: true,
    description: "Pizza con mariscos varios."
  },{
    name: "Pizza marinara",
    type: "Drink",
    available: true,
    description: "Pizza con mariscos varios."
  }, {
    name: "Pizza marinara",
    type: "Dish",
    available: false,
    description: "Pizza con mariscos varios."
  },{
    name: "Pizza marinara",
    type: "Dish",
    available: true,
    description: "Pizza con mariscos varios."
  }, {
    name: "Pizza marinara",
    type: "Dish",
    available: true,
    description: "Pizza con mariscos varios."
  },{
    name: "Pizza marinara",
    type: "Dish",
    available: false,
    description: "Pizza con mariscos varios."
  }];

  constructor() { }

  ngOnInit(): void {
  }

}
