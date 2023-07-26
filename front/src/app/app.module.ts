import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { SharedModule } from './shared/shared.module';
import { ReviewsComponent } from './reviews/reviews.component';
import { HomeComponent } from './home/home.component';
import { MenuModule } from './menu/menu.module';
import { UsersModule } from './users/users.module';
import { CartModule } from './cart/cart.module';
import { StoreModule } from '@ngrx/store';
import { OrdersModule } from './orders/orders.module';
import { BookingsModule } from './bookings/bookings.module';
import { reducers } from 'src/store';

@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    ReviewsComponent,
    HomeComponent,
  ],
  imports: [
    BrowserModule,
    SharedModule,
    AppRoutingModule,
    BookingsModule,
    MenuModule,
    UsersModule,
    CartModule,
    OrdersModule,
    BrowserAnimationsModule,
    StoreModule.forRoot({}, {}),
    StoreModule.forFeature('state', reducers),
    EffectsModule.forRoot([]),
    EffectsModule.forFeature(effects),
  ],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}
