import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-price-chip',
  templateUrl: './price-chip.component.html',
  styleUrls: ['./price-chip.component.scss']
})
export class PriceChipComponent implements OnInit {

  @Input() price: number = 0;
  
  constructor() { }

  ngOnInit(): void {
  }

}
