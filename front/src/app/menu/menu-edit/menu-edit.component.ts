import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MatSelectModule } from '@angular/material/select';
import { Product } from 'src/models/Product';
import { ProductService } from '../product.service';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-menu-edit',
  templateUrl: './menu-edit.component.html',
  styleUrls: ['./menu-edit.component.scss'],
})
export class MenuEditComponent implements OnInit {
  form: FormGroup;
  product: Product;
  constructor(
    private formBuilder: FormBuilder,
    private productService: ProductService,
    private _snackBar: MatSnackBar
  ) {}

  ngOnInit(): void {
    this.form = this.formBuilder.group({
      name: ['', [Validators.required]],
      price: ['', [Validators.required]],
      available: ['', [Validators.required]],
      recipe: ['', [Validators.required]],
      image_path: ['', [Validators.required]],
      description: ['', [Validators.required]],
      type: ['', [Validators.required]],
    });
  }

  submit() {
    this.productService.saveProduct(this.form.value).subscribe(
      (result) => {
        this._snackBar.open('Product added', 'Close', {
          horizontalPosition: 'end',
          verticalPosition: 'bottom',
        });
        this.form = this.formBuilder.group({
          name: ['', [Validators.required]],
          price: ['', [Validators.required]],
          available: ['', [Validators.required]],
          recipe: ['', [Validators.required]],
          image_path: ['', [Validators.required]],
          description: ['', [Validators.required]],
          type: ['', [Validators.required]],
        });
      },
      (error) => {
        this._snackBar.open(
          'An error has occured during adding a product',
          'Close',
          {
            horizontalPosition: 'end',
            verticalPosition: 'bottom',
          }
        );
      }
    );
  }
}
