import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PriceChipComponent } from './price-chip.component';

describe('PriceChipComponent', () => {
  let component: PriceChipComponent;
  let fixture: ComponentFixture<PriceChipComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PriceChipComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PriceChipComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
