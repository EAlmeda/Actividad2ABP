import { Component, OnInit } from '@angular/core';
import { ProductService } from 'src/app/menu/product-service.service';
import { Product } from 'src/models/Product';
import { MatPaginatorModule, PageEvent } from '@angular/material/paginator';
import { MatTableDataSource, MatTableModule } from '@angular/material/table';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss'],
})
export class MenuComponent implements OnInit {
  dataSource: Product[];
  pageIndex: number;
  length: number;
  pageSize: number;
  pageEvent: PageEvent;
  loading: boolean;

  constructor(private productService: ProductService) {}

  ngOnInit(): void {
    this.getData(1)
  }

  nextPage(event?: PageEvent) {
    this.getData(event.pageIndex + 1);

    return event;
  }

  getData(index) {
    this.loading = true;

    this.productService.getProductList(index).subscribe((res) => {
      this.pageIndex = res.current_page - 1;
      this.length = res.total;
      this.dataSource = res.data;
      this.pageSize = res.per_page;

      this.loading = false;
    });
  }
}
