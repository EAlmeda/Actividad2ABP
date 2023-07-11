import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MenuComponent } from './menu-component/menu.component';
import { ProductDisplayComponent } from './product-display/product-display.component';
import { SharedModule } from '../shared/shared.module';



@NgModule({
  declarations: [
    MenuComponent,
    ProductDisplayComponent],
  imports: [
    CommonModule,
    SharedModule
  ]
})
export class MenuModule { }
