import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MenuComponent } from './menu-component/menu.component';
import { ProductDisplayComponent } from './product-display/product-display.component';
import { SharedModule } from '../shared/shared.module';
import { HttpClientModule } from '@angular/common/http';
import { ProductService } from './product.service';
import { MatPaginatorModule } from '@angular/material/paginator';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import { OnlineOrderService } from '../orders/online-order.service';
import { MenuEditComponent } from './menu-edit/menu-edit.component';
import { ReactiveFormsModule } from '@angular/forms';
import { MatSelectModule } from '@angular/material/select';
import { MatCheckboxModule } from '@angular/material/checkbox';


@NgModule({
  declarations: [
    MenuComponent,
    ProductDisplayComponent,
    MenuEditComponent,
  ],
  imports: [
    CommonModule,
    SharedModule,
    HttpClientModule,
    ReactiveFormsModule,
    MatSelectModule ,
    MatPaginatorModule,
    MatProgressSpinnerModule,
    MatCheckboxModule
  ],
  providers:[
    ProductService,
    OnlineOrderService
  ]
})
export class MenuModule { }
