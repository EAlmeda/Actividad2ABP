import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MenuComponent } from './menu-component/menu.component';
import { ProductDisplayComponent } from './product-display/product-display.component';
import { SharedModule } from '../shared/shared.module';
import { HttpClientModule } from '@angular/common/http';
import { ProductService } from './product-service.service';
import { MatPaginatorModule } from '@angular/material/paginator';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';


@NgModule({
  declarations: [
    MenuComponent,
    ProductDisplayComponent,
  ],
  imports: [
    CommonModule,
    SharedModule,
    HttpClientModule,
    MatPaginatorModule,
    MatProgressSpinnerModule
  ],
  providers:[
    ProductService,
  ]
})
export class MenuModule { }
