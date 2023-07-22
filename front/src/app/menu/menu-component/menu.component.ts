import { Component, OnInit } from '@angular/core';
import { Product } from 'src/models/Product';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss'],
})
export class MenuComponent implements OnInit {
  products: Product[] = [
    {
      id: '1',
      name: 'Pizza marinara',
      type: 'Dish',
      available: true,
      price: 16,
      description: 'Pizza con mariscos varios.',
      route:"gyozas.jpg"
    },
    {
      id:'2',
      name: 'Pizza marinara',
      type: 'Drink',
      available: true,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
    {
      id:'3',
      name: 'Pizza marinara',
      type: 'Drink',
      available: false,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
    {
      id:'4',
      name: 'Pizza marinara',
      type: 'Drink',
      available: true,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
    {
      id:'5',
      name: 'Pizza marinara',
      type: 'Drink',
      available: true,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
    {
      id:'6',
      name: 'Pizza marinara',
      type: 'Dish',
      available: false,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
    {
      id:'7',
      name: 'Pizza marinara',
      type: 'Dish',
      available: true,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
    {
      id:'8',
      name: 'Pizza marinara',
      type: 'Dish',
      available: true,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
    {
      id:'9',
      name: 'Pizza marinara',
      type: 'Dish',
      available: false,
      price: 16,
      description: 'Pizza con mariscos varios.',
    },
  ];

  constructor() {}

  ngOnInit(): void {}
}
