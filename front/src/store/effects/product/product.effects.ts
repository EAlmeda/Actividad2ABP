import { Injectable } from '@angular/core';
import { Actions, createEffect, ofType } from '@ngrx/effects';
import * as fromActions from '../../actions/';
import { catchError, map, mergeMap, of } from 'rxjs';
import { ProductService } from 'src/app/menu/product.service';
import { Product } from 'src/models/Product';

@Injectable()
export class ProductEffects {
  public loadProductList$ = createEffect(() =>
    this.actions$.pipe(
      ofType(fromActions.loadProducts),
      mergeMap(() =>
        this.service.getProductList().pipe(
          map((products: Product[]) =>
            fromActions.loadProductsSuccess({
              products,
            })
          ),
          catchError(() => of(fromActions.loadProductsFailure()))
        )
      )
    )
  );

  public saveProduct$ = createEffect(() =>
    this.actions$.pipe(
      ofType(fromActions.saveProduct),
      mergeMap(({ product }) =>
        this.service.saveProduct(product).pipe(
          map(() => fromActions.saveProductSuccess()),
          catchError(() => of(fromActions.saveProductFailure()))
        )
      )
    )
  );

  public updateProduct$ = createEffect(() =>
    this.actions$.pipe(
      ofType(fromActions.updateProduct),
      mergeMap(({ product }) =>
        this.service.updateProduct(product).pipe(
          map(() => fromActions.updateProductSuccess()),
          catchError(() => of(fromActions.updateProductFailure()))
        )
      )
    )
  );

  public deleteProduct$ = createEffect(() =>
    this.actions$.pipe(
      ofType(fromActions.deleteProduct),
      mergeMap(({ productId }) =>
        this.service.deleteProduct(productId).pipe(
          map(() => fromActions.deleteProductSuccess()),
          catchError(() => of(fromActions.deleteProductFailure()))
        )
      )
    )
  );

  public findByName$ = createEffect(() =>
    this.actions$.pipe(
      ofType(fromActions.findProductsByName),
      mergeMap((name: string) =>
        this.service.findByName(name).pipe(
          map((products: Product[]) =>
            fromActions.findProductsByNameSuccess({
              products,
            })
          ),
          catchError(() => of(fromActions.findProductsByNameFailure()))
        )
      )
    )
  );

  public findByPrice$ = createEffect(() =>
    this.actions$.pipe(
      ofType(fromActions.findProductsByPrice),
      mergeMap((price: number) =>
        this.service.findByPrice(price).pipe(
          map((products: Product[]) =>
            fromActions.findProductsByPriceSuccess({
              products,
            })
          ),
          catchError(() => of(fromActions.findProductsByPriceFailure()))
        )
      )
    )
  );

  public findByAvailable$ = createEffect(() =>
    this.actions$.pipe(
      ofType(fromActions.findProductsByAvailable),
      mergeMap((available: boolean) =>
        this.service.findByAvailable(available).pipe(
          map((products: Product[]) =>
            fromActions.findProductsByAvailableSuccess({
              products,
            })
          ),
          catchError(() => of(fromActions.findProductsByAvailableFailure()))
        )
      )
    )
  );

  constructor(
    private readonly actions$: Actions,
    private readonly service: ProductService
  ) {}
}
