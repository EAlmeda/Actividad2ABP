import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../environments/environment';
import { Product } from 'src/models/Product';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  constructor(private http: HttpClient) {}

  public addToCart(product: Product) {
    var cart = JSON.parse(localStorage.getItem('cart'));
    if (cart == undefined) cart = [];
    cart.push(product);
    localStorage.setItem('cart', JSON.stringify(cart));
  }
  public getCart() {
    var cart = JSON.parse(localStorage.getItem('cart'));
    if (cart == undefined) cart = [];
    return cart;
  }
  public getProductList(page: number): Observable<any> {
    return this.http.get<Product[]>(
      environment.serviceURL + '/product/?page=' + page
    );
  }

  public saveProduct(product: Product): Observable<void> {
    return this.http.post<void>(`${environment.serviceURL}/productss`, product);
  }

  public getProductById(id: string): Observable<Product> {
    return this.http.get<Product>(`${environment.serviceURL}/products/${id}`);
  }

  public findByName(name: string): Observable<Product[]> {
    return this.http.get<Product[]>(
      `${environment.serviceURL}/products/name/${name}`
    );
  }

  public findByPrice(price: number): Observable<Product[]> {
    return this.http.get<Product[]>(
      `${environment.serviceURL}/products/price/${price}`
    );
  }

  public findByAvailable(available: boolean): Observable<Product[]> {
    return this.http.get<Product[]>(
      `${environment.serviceURL}/products/available/${available}`
    );
  }

  public findByImagePath(imagePath: string): Observable<Product[]> {
    return this.http.get<Product[]>(
      `${environment.serviceURL}/products/image-path/${imagePath}`
    );
  }

  public findByDescription(description: string): Observable<Product[]> {
    return this.http.get<Product[]>(
      `${environment.serviceURL}/products/description/${description}`
    );
  }

  public findByType(type: string): Observable<Product[]> {
    return this.http.get<Product[]>(
      `${environment.serviceURL}/products/type/${type}`
    );
  }

  public findByAllColumns(value: string): Observable<Product[]> {
    return this.http.get<Product[]>(
      `${environment.serviceURL}/products/all/${value}`
    );
  }

  public updateProduct(product: Product): Observable<void> {
    return this.http.post<void>(
      `${environment.serviceURL}/products/${product.id}`,
      product
    );
  }

  public deleteProduct(id: string): Observable<void> {
    return this.http.delete<void>(`${environment.serviceURL}/products/${id}`);
  }
}
