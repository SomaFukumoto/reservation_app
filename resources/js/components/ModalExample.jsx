'use client';

import * as React from 'react';
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog';
import { Button } from '@/components/ui/button';

export default function ModalExample() {
  return (
    <Dialog>
      <DialogTrigger asChild>
        <Button variant="default">モーダルを開く</Button>
      </DialogTrigger>
      <DialogContent>
        <DialogHeader>
          <DialogTitle>モーダルのタイトル</DialogTitle>
          <DialogDescription>
            これは shadcn/ui で作成したモーダルです。自由にカスタマイズ可能です。
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  );
}
