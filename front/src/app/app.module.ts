import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { SharedModule } from './shared/shared.module';
import { BookATableComponent } from './book-a-table/book-atable.component';
import { MenuComponent } from './menu/menu-component/menu.component';
import { OrdersComponent } from './orders/orders.component';
import { ReviewsComponent } from './reviews/reviews.component';
import { HomeComponent } from './home/home.component';
import { MenuModule } from './menu/menu.module';
import { UsersModule } from './users/users.module';
import { CartModule } from './cart/cart.module';
import { OrderDisplayComponent } from './orders/order-display/order-display.component';

@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    BookATableComponent,
    OrdersComponent,
    ReviewsComponent,
    HomeComponent,
    OrderDisplayComponent, 
    
  ],
  imports: [
    BrowserModule,
    SharedModule,
    AppRoutingModule,
    MenuModule,
    UsersModule,
    CartModule,
    BrowserAnimationsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
