import { Component, OnInit } from '@angular/core';
import { Store } from '@ngrx/store';
import { Observable } from 'rxjs';
import { Product } from 'src/models/Product';
import { selectProductList } from 'src/store/reducers/product/product.reducer';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss'],
})
export class MenuComponent implements OnInit {
  public products$: Observable<Product[]>;
  // products: Product[] = [
  //   {
  //     id: '1',
  //     name: 'Pizza marinara',
  //     type: 'Dish',
  //     available: true,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '2',
  //     name: 'Pizza marinara',
  //     type: 'Drink',
  //     available: true,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '3',
  //     name: 'Pizza marinara',
  //     type: 'Drink',
  //     available: false,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '4',
  //     name: 'Pizza marinara',
  //     type: 'Drink',
  //     available: true,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '5',
  //     name: 'Pizza marinara',
  //     type: 'Drink',
  //     available: true,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '6',
  //     name: 'Pizza marinara',
  //     type: 'Dish',
  //     available: false,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '7',
  //     name: 'Pizza marinara',
  //     type: 'Dish',
  //     available: true,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '8',
  //     name: 'Pizza marinara',
  //     type: 'Dish',
  //     available: true,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  //   {
  //     id: '9',
  //     name: 'Pizza marinara',
  //     type: 'Dish',
  //     available: false,
  //     price: 16,
  //     description: 'Pizza con mariscos varios.',
  //     route: 'gyozas.jpg',
  //     image_path: 'gyozas.jpg',
  //   },
  // ];

  constructor(private store: Store) {
    this.products$ = this.store.select(selectProductList);
  }

  ngOnInit(): void {}
}
