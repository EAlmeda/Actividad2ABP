import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { BookATableComponent } from './book-a-table/book-atable.component';
import { MenuComponent } from './menu/menu-component/menu.component';
import { OrdersComponent } from './orders/orders.component';
import { ReviewsComponent } from './reviews/reviews.component';
import { HomeComponent } from './home/home.component';
import { ProfileComponent } from './users/profile/profile.component';
import { ShoppingCartComponent } from './cart/shopping-cart/shopping-cart.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'book-a-table', component: BookATableComponent },
  { path: 'menu', component: MenuComponent },
  { path: 'orders', component: OrdersComponent },
  { path: 'reviews', component: ReviewsComponent },
  { path: 'profile', component: ProfileComponent },
  { path: 'cart', component: ShoppingCartComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
